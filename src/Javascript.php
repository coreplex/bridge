<?php

namespace Coreplex\Bridge;

use Coreplex\Bridge\Contracts\Javascript as JavascriptContract;

class Javascript implements JavascriptContract
{
    /**
     * The shared data which will be encoded to JSON before being echoed out
     * to the view
     *
     * @var array
     */
    protected $sharedData = [];

    /**
     * Shares data with the view.
     *
     * @param  mixed        $key
     * @param  array|string $data
     * @return $this
     */
    public function share($key, $data)
    {
        if (is_array($key)) {
            $this->sharedData = array_merge($this->sharedData, $key);
        } else {
            $this->sharedData[$key] = $data;
        }

        return $this;
    }

    /**
     * Renders the shared data from the array.
     *
     * @return string
     */
    public function renderSharedData()
    {
        return sprintf(
            '<script type="text/javascript">%s sharedData = %s;</script>',
            $this->getGlobalAccessJsFunction(),
            json_encode($this->sharedData)
        );
    }

    /**
     * Returns JavaScript for a global accessor using the array dot notation
     * (e.g. getSharedData('arrayMaster.arrayChild'))
     *
     * @return string
     */
    protected function getGlobalAccessJsFunction($functionName = 'getSharedData')
    {
        return '
if (typeof window.' . $functionName . ' === "undefined") {
    /**
     * The following function can be used to retrieve key associated that have
     * been shared with this current view response. The first argument is the
     * key of the item you want to retrieve in JSON string form, for example
     * getSharedData(\'language.form.create\'); would retrieve
     * sharedData.language.form.create. If this is undefined, the second
     * argument will be used as a default return value. If this isn\'t set,
     * undefined would be returned
     *
     * If not arguments are passed, the entire shared data array is returned
     */
    window.' . $functionName . ' = function(key, defaultIfNotExists)
    {
        var sharedData = window.sharedData;

        if (typeof key === "undefined") {
            return sharedData;
        }

        var returnData = false;

        var arrayParts = key.split(".");
       var iterations = arrayParts.length;

        for (var i = 0; i < iterations; i++) {
            if ( ! returnData) {
                returnData = sharedData[arrayParts[i]];
            } else {
                returnData = returnData[arrayParts[(i)]];
            }
        }

        if (typeof returnData === "undefined" && typeof defaultIfNotExists !== "undefined") {
            return defaultIfNotExists;
        }

        return returnData;
    };
}
        ';
    }
}