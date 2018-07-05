<style type="text/css">

    .cfg-btn {
        background-color: rgb(55, 181, 114);
        color: #fff;
        border: 0;
        box-shadow: 0 0 1px 0px rgba(0,0,0,0.3);
        outline:0;
        cursor: pointer;
        width: 200px;
        padding: 10px;
        font-size: 1em;
        position: relative;
        display: inline-block;
        margin: 10px auto;
    }
    .cfg-btn:hover:not([disabled]) {
        background-color: rgb(37, 215, 120);
    }
    .mobile-magic .cfg-btn:hover:not([disabled]) { background: rgb(55, 181, 114); }
    .cfg-btn[disabled] { opacity: .5; color: #808080; background: #ddd; }

    .cfg-btn.btn-preview,
    .cfg-btn.btn-preview:active,
    .cfg-btn.btn-preview:focus {
        font-size: 1em;
        position: relative;
        display: block;
        margin: 10px auto;
    }

    .cfg-btn,
    .preview,
    .app-figure,
    .api-controls,
    .wizard-settings,
    .wizard-settings .inner,
    .wizard-settings .footer,
    .wizard-settings input,
    .wizard-settings select {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .preview,
    .wizard-settings {
        padding: 10px;
        border: 0;
        min-height: 1px;
    }
    .preview {
        position: relative;
    }

    .api-controls {
        text-align: center;
    }
    .api-controls button,
    .api-controls button:active,
    .api-controls button:focus {
       width: 80px; font-size: .7em;
       white-space: nowrap;
   }

   .app-figure {
    width: 100% !important;
    margin: 0px auto;
    border: 0px solid red;
    padding: 0px;
    position: relative;
    text-align: center;
}
.selectors { margin-top: 10px; }
.selectors .mz-thumb img { 
    max-width: 100%;
    margin-left: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px; }

    .app-code-sample {
        max-width: 80%;
        margin: 30px auto 0;
        text-align: center;
        position: relative;
    }
    .app-code-sample input[type="radio"] {
        display: none;
    }
    .app-code-sample label {
        display: inline-block;
        padding: 2px 12px;
        margin: 0;
        font-size: .8em;
        text-decoration: none;
        cursor: pointer;
        color: #666;
        border: 1px solid rgba(136, 136, 136, 0.5);
        background-color: transparent;
    }
    .app-code-sample label:hover {
        color: #fff;
        background-color: rgb(253, 154, 30);
        border-color: rgb(253, 154, 30);
    }
    .app-code-sample input[type="radio"]:checked+label {
        color: #fff;
        background-color: rgb(110, 110, 110) !important;
        border-color: rgba(110, 110, 110, 0.7) !important;
    }
    .app-code-sample label:first-of-type {
        border-radius: 4px 0 0 4px;
        border-right-color: transparent;
    }
    .app-code-sample label:last-of-type {
        border-radius: 0 4px 4px 0;
        border-left-color: transparent;
    }

    .app-code-sample .app-code-holder {
        padding: 0;
        position: relative;
        border: 1px solid #eee;
        border-radius: 0px;
        background-color: #fafafa;
        margin: 15px 0;
    }
    .app-code-sample .app-code-holder > div {
        display: none;
    }
    .app-code-sample .app-code-holder pre {
        text-align: left;
        white-space: pre-line;
        border: 0px solid #eee;
        border-radius: 0px;
        background-color: transparent;
        padding: 25px 50px 25px 25px;
        margin: 0;
        min-height: 25px;
    }
    .app-code-sample input[type="radio"]:nth-of-type(1):checked ~ .app-code-holder > div:nth-of-type(1) {
        display: block;
    }
    .app-code-sample input[type="radio"]:nth-of-type(2):checked ~ .app-code-holder > div:nth-of-type(2) {
        display: block;
    }

    .app-code-sample .app-code-holder .cfg-btn-copy {
        display: none;
        z-index: -1;
        position: absolute;
        top:10px; right: 10px;
        width: 44px;
        font-size: .65em;
        white-space: nowrap;
        margin: 0;
        padding: 4px;
    }
    .copy-msg {
        font: normal 11px/1.2em 'Helvetica Neue', Helvetica, 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, sans-serif;
        color: #2a4d14;
        border: 1px solid #2a4d14;
        border-radius: 4px;
        position: absolute;
        top: 8px;
        left: 0;
        right: 0;
        width: 200px;
        max-width: 70%;
        padding: 4px;
        margin: 0px auto;
        text-align: center;
    }
    .copy-msg-failed {
        color: #b80c09;
        border-color: #b80c09;
        width: 430px;
    }
    .mobile-magic .app-code-sample .cfg-btn-copy { display: none; }
    #code-to-copy { position: absolute; width: 0; height: 0; top: -10000px; }
    .lt-ie9-magic .app-code-sample { display: none; }

    .wizard-settings {
        background-color: #4f4f4f;
        color: #a5a5a5;
        position: absolute;
        right: 0;
        width: 340px;
    }
    .wizard-settings .inner {
        width: 100%;
        margin-bottom: 30px;
    }
    .wizard-settings .footer {
        color: #c7d59f;
        font-size: .75em;
        width: 100%;
        position: relative;
        vertical-align: bottom;
        text-align: center;
        padding: 6px;
        margin-top: 10px;
    }
    .wizard-settings .footer a { color: inherit; text-decoration: none; }
    .wizard-settings .footer a:hover { text-decoration: underline; }

    .wizard-settings a { color: #cc9933; }
    .wizard-settings a:hover { color: #dfb363; }
    .wizard-settings table > tbody > tr > td { vertical-align: top; }
    .wizard-settings table { min-width: 300px; max-width: 100%; font-size: .8em; margin: 0 auto; }
    .wizard-settings table caption { font-size: 1.5em; padding: 16px 8px; }
    .wizard-settings table td { padding: 4px 8px; }
    .wizard-settings table td:first-child { white-space: nowrap; }
    .wizard-settings table td:nth-child(2) { text-align: left; }
    .wizard-settings table td .values {
        color: #a08794;
        font-size: 0.8em;
        line-height: 1.3em;
        display: block;
        max-width: 126px;
    }
    .wizard-settings table td .values:before { content: ''; display: block; }

    .wizard-settings input,
    .wizard-settings select {
        width: 126px;
    }
    .wizard-settings input {
        padding: 0px 4px;
    }
    .wizard-settings input[disabled] {
        color: #808080;
        background: #a7a7a7;
        border: 1px solid #a7a7a7;
    }

    .preview { width: 70%; float: left; }
    @media (min-width: 0px) {
        .preview { width: 100%; float: none; }
    }

    @media (min-width: 1024px) {
        .preview { width: calc(100% - 340px); }
        .wizard-settings { top: 0; min-height: 100%; }
        .wizard-settings .inner { margin-top: 60px; }
        .wizard-settings .footer { position: absolute; bottom: 0; left: 0; }
        .wizard-settings .settings-controls {
            position: fixed;
            top: 0; right: 0;
            width: 340px;
            padding: 10px 0 0;
            text-align: center;
            background-color: inherit;
        }
    }
    @media screen and (max-width: 1024px) {
        .api-controls button, .api-controls button:active, .api-controls button:focus {
            width: 70px;
        }
    }
    @media screen and (max-width: 1023px) {
        .app-figure { width: 100% !important; margin: 0px auto; padding: 0; }
        .app-code-sample { display: none; }
        .wizard-settings { width: 100%; }
    }
    @media screen and (max-width: 600px) {
        .mz-thumb img { max-width: 39px; }
    }
    @media screen and (max-width: 560px) {
        .api-controls .sep { content: ''; display: table; }
    }
    @media screen and (min-width: 1600px) {
        .preview { padding: 10px 160px; }
    }
</style>
<style>
    .owl-prev {
      position: absolute;
      z-index: 99;
      top: 25%;
      bottom: 0;
      right: auto;
      left: -5px;
      font-size: 40px;
      color: #fff;
      text-align: center;
      margin: 5px;
      padding: 3px 10px;
      background-color: #000;
      width: 33px;
      height: 50px;
      filter: alpha(opacity=50);
      opacity: .9;

  }
      .owl-prev:hover {

      opacity: 1;

  }
  .owl-next {
      position: absolute;
      z-index: 99;
      top: 25%;
      bottom: 0;
      right: -5px;
      left: auto;
      font-size: 40px;
      color: #fff;
      text-align: center;
      margin: 5px;
      padding: 3px 10px;
      background-color: #000;
      width: 33px;
      height: 50px;
      filter: alpha(opacity=50);
      opacity: .9;

  }
        .owl-next:hover {

      opacity: 1;

  }

</style>   