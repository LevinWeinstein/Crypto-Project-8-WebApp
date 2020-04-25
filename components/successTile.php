<main>
  <div id="outerWrapper">
    <div id="successTile">
        <div id="successText">
            Success! Hello, <?php echo $_COOKIE['vanilla_user'] ?>!
        </div>
    </div>
  </div>

  <style scoped>

    @keyframes hoverGrow {
        from { width: 30%; height: 30%; box-shadow: 0 3px 6px 0 black; font-size: 100%; }
        to { width: 30.5%; height: 30.5%; box-shadow: 0 8px 16px 0 black; font-size: 103%; }
    }

    @keyframes hoverShrink {
        from { width: 30.5%; height: 30.5%; box-shadow: 0 8px 16px 0 black; font-size: 103%; }
        to { width: 30%; height: 30%; box-shadow: 0 3px 6px 0 black; font-size: 100%; }
    }

    main {
        height: 70%;
        position: relative;
        z-index: 4;
        top: 42px;
        right: 0;
        left: 0;
    }

    html, body {
        height: 99%;
    }

    body {
        background: #EDEAD0;
    }

    #successTile input {
        display: block;
        margin: 15px 30px;
    }

    #successTile {

        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        
        width: 30%;
        height: 30%;
        color: #66D9EF;
        text-align: center;
        font-family: "Courier New", Courier, monospace;
        background: #424242;
        opacity: 0.95;
        box-shadow: 0 3px 6px 0 black;

        display: flex;
        justify-content: center;
        align-items: center;

        animation-name: hoverShrink;
        animation-duration: 0.5s;
        animation-fill-mode: forwards;
    }

    #successTile:hover {
        animation-name: hoverGrow;
        animation-duration: 0.5s;
        animation-fill-mode: forwards;
    }

    #successTile:active {
        background: #535353;
    }

    #outerWrapper {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
  </style>

</main>