# CallToActionTV
![calltoactiontv version](https://img.shields.io/badge/version-1.0.0-blue.svg) ![MODX Extra by Sterc](https://img.shields.io/badge/checked%20by-sterc-ff69b4.svg) ![MODX version requirements](https://img.shields.io/badge/modx%20version%20requirement-2.0%2B-brightgreen.svg)

## Usage

| Property       | Description                                                                            |
|----------------|----------------------------------------------------------------------------------------|
| input          | TV value of type calltoactiontv                                                        |
| options        | Custom chunk name                                                                      |
| toPlaceholders | Specify the placeholder prefix to output the values to placeholders using this prefix. |

Default usage: `[[*ctatv:calltoactiontv]]` will output a link with the default CallToActionTV chunk.
In order to use a custom chunk you simply specify a chunk name like this:
```
[[*ctatv:calltoactiontv:=`MyCustomChunk`]]

Or, if you are using it as a snippet:
[[calltoactiontv?
    &input=`ctatv`
    &options=`MyCustomChunk`
]]

Using toPlaceholders:
[[calltoactiontv?
    &input=`ctatv`
    &options=`MyCustomChunk`
    &toPlaceholders=`ctatv.`
]]

<a href="[[+ctatv.href]]" title="[[+ctatv.text]]" target="[[+ctatv.target]]" rel="[[+ctatv.rel]]">
    [[+ctatv.text]]
</a>
```

