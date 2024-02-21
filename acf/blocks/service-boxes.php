<?php

/**
 * Custom NojuCommerce Product list block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'service-boxes-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-service-boxes';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$icons = array(
    'icon-code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 0H64C28.65 0 0 28.65 0 64v288c0 35.35 28.65 64 64 64h149.7l-19.2 64H144C135.2 480 128 487.2 128 496S135.2 512 144 512h288c8.836 0 16-7.164 16-16S440.8 480 432 480h-50.49l-19.2-64H512c35.35 0 64-28.65 64-64V64C576 28.65 547.3 0 512 0zM227.9 480l19.2-64h81.79l19.2 64H227.9zM544 352c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h448c17.64 0 32 14.36 32 32V352zM235.3 132.7c-6.25-6.25-16.38-6.25-22.62 0l-64 64c-6.25 6.25-6.25 16.38 0 22.62l64 64C215.8 286.4 219.9 288 224 288s8.188-1.562 11.31-4.688c6.25-6.25 6.25-16.38 0-22.62L182.6 208l52.69-52.69C241.6 149.1 241.6 138.9 235.3 132.7zM363.3 132.7c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62L393.4 208l-52.69 52.69c-6.25 6.25-6.25 16.38 0 22.62C343.8 286.4 347.9 288 352 288s8.188-1.562 11.31-4.688l64-64c6.25-6.25 6.25-16.38 0-22.62L363.3 132.7z"/></svg>',
    'icon-tv' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M448 96L299.2 96l79.17-67.86c6.719-5.75 7.5-15.84 1.75-22.55c-5.781-6.734-15.88-7.469-22.56-1.734L256 90.92L154.4 3.859c-6.656-5.734-16.75-5-22.56 1.734C126.1 12.3 126.9 22.39 133.6 28.14L212.8 96L64 96c-35.35 0-64 28.65-64 63.1v287.1C0 483.3 28.65 512 64 512h384c35.35 0 64-28.65 64-63.1V160C512 124.7 483.3 96 448 96zM480 448c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V160c0-17.64 14.36-32 32-32h384c17.64 0 32 14.36 32 32V448zM320.1 160L128.1 160c-35.35 0-64 28.65-64 64v160c0 35.35 28.65 64 64 64l191.1 .0002c35.35 0 64.01-28.65 64.01-64V224C384.1 188.7 355.4 160 320.1 160zM352 384c0 17.64-14.36 32-32 32H128c-17.64 0-32-14.36-32-32V224c0-17.64 14.36-32 32-32h192c17.64 0 32 14.36 32 32V384zM432 184c-13.25 0-24 10.74-24 24c0 13.25 10.75 24 24 24c13.26 0 24-10.75 24-24C456 194.7 445.3 184 432 184zM432 248c-13.25 0-24 10.74-24 24c0 13.25 10.75 24 24 24c13.26 0 24-10.75 24-24C456 258.7 445.3 248 432 248z"/></svg>',
    'icon-ai' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M222.7 185.6c-5.094-11.66-24.22-11.66-29.31 0l-56 128c-3.547 8.094 .1406 17.52 8.25 21.06c8.031 3.562 17.52-.1719 21.06-8.25L176.5 304h63.08l9.805 22.41C251.1 332.4 257.8 336 264 336c2.141 0 4.323-.4219 6.401-1.344c8.109-3.547 11.8-12.97 8.25-21.06L222.7 185.6zM190.5 272L208 231.9L225.5 272H190.5zM336 176C327.2 176 320 183.2 320 192v128c0 8.844 7.156 16 16 16S352 328.8 352 320V192C352 183.2 344.8 176 336 176zM496 272C504.8 272 512 264.8 512 256s-7.156-16-16-16H448v-64h48C504.8 176 512 168.8 512 160s-7.156-16-16-16H448V128c0-35.35-28.65-64-64-64h-16V16C368 7.156 360.8 0 352 0s-16 7.156-16 16V64h-64V16C272 7.156 264.8 0 256 0S240 7.156 240 16V64h-64V16C176 7.156 168.8 0 160 0S144 7.156 144 16V64H128C92.65 64 64 92.65 64 128v16H16C7.156 144 0 151.2 0 160s7.156 16 16 16H64v64H16C7.156 240 0 247.2 0 256s7.156 16 16 16H64v64H16C7.156 336 0 343.2 0 352s7.156 16 16 16H64V384c0 35.35 28.65 64 64 64h16v48C144 504.8 151.2 512 160 512s16-7.156 16-16V448h64v48c0 8.844 7.156 16 16 16s16-7.156 16-16V448h64v48c0 8.844 7.156 16 16 16s16-7.156 16-16V448H384c35.35 0 64-28.65 64-64v-16h48c8.844 0 16-7.156 16-16s-7.156-16-16-16H448v-64H496zM416 384c0 17.64-14.36 32-32 32H128c-17.64 0-32-14.36-32-32V128c0-17.64 14.36-32 32-32h256c17.64 0 32 14.36 32 32V384z"/></svg>',
    'icon-analytics' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M240 32C266.5 32 288 53.49 288 80V432C288 458.5 266.5 480 240 480H208C181.5 480 160 458.5 160 432V80C160 53.49 181.5 32 208 32H240zM240 64H208C199.2 64 192 71.16 192 80V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V80C256 71.16 248.8 64 240 64zM80 224C106.5 224 128 245.5 128 272V432C128 458.5 106.5 480 80 480H48C21.49 480 0 458.5 0 432V272C0 245.5 21.49 224 48 224H80zM80 256H48C39.16 256 32 263.2 32 272V432C32 440.8 39.16 448 48 448H80C88.84 448 96 440.8 96 432V272C96 263.2 88.84 256 80 256zM320 144C320 117.5 341.5 96 368 96H400C426.5 96 448 117.5 448 144V432C448 458.5 426.5 480 400 480H368C341.5 480 320 458.5 320 432V144zM352 144V432C352 440.8 359.2 448 368 448H400C408.8 448 416 440.8 416 432V144C416 135.2 408.8 128 400 128H368C359.2 128 352 135.2 352 144z"/></svg>',
    'icon-browser' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 32H512V480H0V32zm160 72v48H448V104H160zm-32-8H64v64h64V96z"/></svg>',
    'icon-globe' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM256 480C272.7 480 296.4 465.6 317.9 422.7C327.8 402.9 336.1 378.1 341.1 352H170C175.9 378.1 184.2 402.9 194.1 422.7C215.6 465.6 239.3 480 256 480V480zM164.3 320H347.7C350.5 299.8 352 278.3 352 256C352 233.7 350.5 212.2 347.7 192H164.3C161.5 212.2 160 233.7 160 256C160 278.3 161.5 299.8 164.3 320V320zM341.1 160C336.1 133 327.8 109.1 317.9 89.29C296.4 46.37 272.7 32 256 32C239.3 32 215.6 46.37 194.1 89.29C184.2 109.1 175.9 133 170 160H341.1zM379.1 192C382.6 212.5 384 233.9 384 256C384 278.1 382.6 299.5 379.1 320H470.7C476.8 299.7 480 278.2 480 256C480 233.8 476.8 212.3 470.7 192H379.1zM327.5 43.66C348.5 71.99 365.1 112.4 374.7 160H458.4C432.6 105.5 385.3 63.12 327.5 43.66V43.66zM184.5 43.66C126.7 63.12 79.44 105.5 53.56 160H137.3C146.9 112.4 163.5 71.99 184.5 43.66V43.66zM32 256C32 278.2 35.24 299.7 41.28 320H132C129.4 299.5 128 278.1 128 256C128 233.9 129.4 212.5 132 192H41.28C35.24 212.3 32 233.8 32 256V256zM458.4 352H374.7C365.1 399.6 348.5 440 327.5 468.3C385.3 448.9 432.6 406.5 458.4 352zM137.3 352H53.56C79.44 406.5 126.7 448.9 184.5 468.3C163.5 440 146.9 399.6 137.3 352V352z"/></svg>',
    'icon-cloud' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 479.8V480H144C64.47 480 0 415.5 0 336C0 273.3 40.07 219.1 96 200.2V200C96 107.2 171.2 32 264 32C314.9 32 360.4 54.6 391.3 90.31C406.2 83.68 422.6 80 440 80C506.3 80 560 133.7 560 200C560 206.6 559.5 213 558.5 219.3C606.5 240.3 640 288.3 640 344C640 416.4 583.4 475.6 512 479.8zM378.2 148.7L354.9 121.7C332.8 96.08 300.3 80 264 80C197.7 80 144 133.7 144 199.1L144 234.1L111.1 245.4C74.64 258.7 48 294.3 48 336C48 389 90.98 432 144 432H506.6L509.2 431.8C555.4 429.2 592 390.8 592 344C592 308 570.4 276.9 539.2 263.3L505.1 248.4L511.1 211.7C511.7 207.9 512 204 512 200C512 160.2 479.8 128 440 128C429.5 128 419.6 130.2 410.8 134.2L378.2 148.7zM144 199.1C144 199.1 144 199.1 144 199.1V199.1z"/></svg>',
    'icon-info' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 184c13.25 0 24-10.74 24-24c0-13.25-10.75-24-24-24S200 146.7 200 160C200 173.3 210.7 184 224 184zM384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416zM272 352h-32V240C240 231.2 232.8 224 224 224H192C183.2 224 176 231.2 176 240S183.2 256 192 256h16v96h-32C167.2 352 160 359.2 160 368C160 376.8 167.2 384 176 384h96c8.836 0 16-7.164 16-16C288 359.2 280.8 352 272 352z"/></svg>',
    'icon-cart' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 16C64 7.2 71.2 0 80 0h37.9c20.6 0 38.6 13 45.3 32H603.5c20.8 0 36.1 19.6 31 39.8L592.6 239.5C585.5 268 559.9 288 530.5 288H216l7.9 38.4c3 14.9 16.1 25.6 31.4 25.6H560c8.8 0 16 7.2 16 16s-7.2 16-16 16H255.2c-30.4 0-56.6-21.4-62.7-51.2l-58.9-288C132 37.3 125.5 32 117.9 32H80c-8.8 0-16-7.2-16-16zM530.5 256c14.7 0 27.5-10 31-24.2L603.5 64H170.1l39.3 192H530.5zM256 480a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm0-80a56 56 0 1 1 0 112 56 56 0 1 1 0-112zm280 56a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zm-80 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zM16 128h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H16c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H128c8.8 0 16 7.2 16 16s-7.2 16-16 16H16c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H16c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>',
    'icon-text' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M448-.0004H64c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.98c0 9.838 11.03 15.55 19.12 9.7L304 415.1H448c35.25 0 64-28.75 64-63.1V63.1C512 28.75 483.3-.0004 448-.0004zM480 352c0 17.6-14.4 32-32 32h-144.1c-6.928 0-13.67 2.248-19.21 6.406L192 460v-60c0-8.838-7.164-16-16-16H64c-17.6 0-32-14.4-32-32V64c0-17.6 14.4-32 32-32h384c17.6 0 32 14.4 32 32V352zM320 128H192C183.2 128 176 135.2 176 144S183.2 160 192 160h48v112C240 280.8 247.2 288 256 288s16-7.156 16-16V160H320c8.844 0 16-7.156 16-16S328.8 128 320 128z"/></svg>',
    'icon-shield-slash' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 0c4.6 0 9.2 1 13.4 2.9L521.7 82.8c22 9.3 38.4 31 38.3 57.2c-.3 58.7-14.7 146.2-62.1 225L630.8 469.1c10.4 8.2 12.3 23.3 4.1 33.7s-23.3 12.3-33.7 4.1L9.2 42.9C-1.2 34.7-3.1 19.6 5.1 9.2S28.4-3.1 38.8 5.1L131 77.4 306.7 2.9C310.8 1 315.4 0 320 0zM80.6 159.5L437.5 440.7c-25.2 24-55.3 45.4-91.1 62.5c-16.7 8-36.1 8-52.8 0C132 425.8 86.1 261.5 80.6 159.5z"/></svg>',
    'icon-skull' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M400 128c0 44.4-25.4 83.5-64 106.4V256c0 17.7-14.3 32-32 32H208c-17.7 0-32-14.3-32-32V234.4c-38.6-23-64-62.1-64-106.4C112 57.3 176.5 0 256 0s144 57.3 144 128zM200 176c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zm144-32c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zM35.4 273.7c7.9-15.8 27.1-22.2 42.9-14.3L256 348.2l177.7-88.8c15.8-7.9 35-1.5 42.9 14.3s1.5 35-14.3 42.9L327.6 384l134.8 67.4c15.8 7.9 22.2 27.1 14.3 42.9s-27.1 22.2-42.9 14.3L256 419.8 78.3 508.6c-15.8 7.9-35 1.5-42.9-14.3s-1.5-35 14.3-42.9L184.4 384 49.7 316.6c-15.8-7.9-22.2-27.1-14.3-42.9z"/></svg>',
    'icon-burst' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M200.9 116.2L233.2 16.6C236.4 6.706 245.6 .001 256 .001C266.4 .001 275.6 6.706 278.8 16.6L313.3 123.1L383.8 97.45C392.6 94.26 402.4 96.43 408.1 103C415.6 109.6 417.7 119.4 414.6 128.2L388.9 198.7L495.4 233.2C505.3 236.4 512 245.6 512 256C512 266.4 505.3 275.6 495.4 278.8L392.3 312.2L445.2 412.8C450.1 422.1 448.4 433.5 440.1 440.1C433.5 448.4 422.1 450.1 412.8 445.2L312.2 392.3L278.8 495.4C275.6 505.3 266.4 512 256 512C245.6 512 236.4 505.3 233.2 495.4L199.8 392.3L99.17 445.2C89.87 450.1 78.46 448.4 71.03 440.1C63.6 433.5 61.87 422.1 66.76 412.8L119.7 312.2L16.6 278.8C6.705 275.6 .0003 266.4 .0003 256C.0003 245.6 6.705 236.4 16.6 233.2L116.2 200.9L4.208 37.57C-2.33 28.04-1.143 15.2 7.03 7.03C15.2-1.144 28.04-2.33 37.57 4.208L200.9 116.2zM146.5 211.2C143.3 220.8 135.7 228.2 126.1 231.3L49.96 256L129.5 281.8C138.5 284.7 145.8 291.4 149.3 300.2C152.9 308.9 152.4 318.8 147.1 327.1L107.1 404.9L184.9 364C193.2 359.6 203.1 359.1 211.8 362.7C220.6 366.2 227.3 373.5 230.2 382.5L256 462L281.8 382.5C284.7 373.5 291.4 366.2 300.2 362.7C308.9 359.1 318.8 359.6 327.1 364L404.9 404.9L364 327.1C359.6 318.8 359.1 308.9 362.7 300.2C366.2 291.4 373.5 284.7 382.5 281.8L462 256L379 229.1C370.8 226.4 363.9 220.5 360.1 212.7C356.3 204.9 355.8 195.9 358.8 187.7L378.6 133.4L324.3 153.2C316.1 156.2 307.1 155.7 299.3 151.9C291.5 148.1 285.6 141.2 282.9 132.1L256 49.96L231.3 126.1C228.2 135.7 220.8 143.3 211.2 146.5C201.7 149.8 191.1 148.3 182.8 142.6L54.87 54.87L142.6 182.8C148.3 191.1 149.8 201.7 146.5 211.2L146.5 211.2z"/></svg>',
    'icon-triangle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 360c-13.25 0-23.1 10.74-23.1 24c0 13.25 10.75 24 23.1 24c13.25 0 23.1-10.75 23.1-24C280 370.7 269.3 360 256 360zM256 320c8.843 0 15.1-7.156 15.1-16V160c0-8.844-7.155-16-15.1-16S240 151.2 240 160v144C240 312.8 247.2 320 256 320zM504.3 397.3L304.5 59.38C294.4 42.27 276.2 32.03 256 32C235.8 32 217.7 42.22 207.5 59.36l-199.9 338c-10.05 16.97-10.2 37.34-.4218 54.5C17.29 469.5 35.55 480 56.1 480h399.9c20.51 0 38.75-10.53 48.81-28.17C514.6 434.7 514.4 414.3 504.3 397.3zM476.1 435.1C472.7 443.5 464.8 448 455.1 448H56.1c-8.906 0-16.78-4.484-21.08-12c-4.078-7.156-4.015-15.3 .1562-22.36L235.1 75.66C239.4 68.36 247.2 64 256 64c0 0-.0156 0 0 0c8.765 .0156 16.56 4.359 20.86 11.64l199.9 338C480.1 420.7 481.1 428.8 476.1 435.1z"/></svg>',

);
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 pb-5">
                <p>--- <?php the_field('top_text'); ?></p>
                <h2><?php the_field('heading'); ?></h2>
                <p><?php the_field('text'); ?></p>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <?php if (have_rows('service_boxes')):while (have_rows('service_boxes')) : the_row();
                        $chosenIcon = get_sub_field('choose_icon');
                        ?>
                        <div class="col-md-6 d-flex service-box">
                            <div class="icon-container">
                                <?php echo $icons[$chosenIcon]; ?>
                            </div>
                            <div class="content">
                                <h3><?php the_sub_field('heading'); ?></h3>
                                <p><?php the_sub_field('text'); ?></p>
                                <?php if(get_sub_field('link')): ?>
                                <a href="#">Read more &raquo;</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>