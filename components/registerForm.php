<main>
  <div id="outerWrapper">
    <form id="passwordForm" method="POST" action="controllers/registrationController.php">
      <input type="text" name="username" id="username" placeholder="username" required />
      <input type="password" name="password" id="password" placeholder="password" required />
      <input type="password" name="password-confirm" id="password-confirm" placeholder="confirm password" required />

      <input type="submit" value="Sign up" onclick="doNothing(event)"/>
    </form>
  </div>
  <style scoped>
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

    form input {
        display: block;
        margin: 15px 30px;
    }

    form {
        background: coral;
        opacity: 0.95;
        display: inline-block;
        box-shadow: 0 3px 6px 0;
    }

    form:hover {
        box-shadow: 0 4px 8px 0;
    }

    #outerWrapper {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input[type=submit]{
        width: 65%;
        border-radius: 0px;
        border: 5px;
        background: white;
        opacity: 90%;
        margin: 15px auto;
        box-shadow: 0px 0px 0.2px 0.2px brown;
    }

    input[type=submit]:hover{
        box-shadow: 0 2px 4px 0 white;
    }
  </style>

</main>