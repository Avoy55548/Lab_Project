<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AQI</title>
    <link rel="stylesheet" href="aqiStyle.css" />

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: center;
        align-items: center;
      }

      .container {
        display: flex;
        width: 50%;
        height: 80vh;
      }

      .column {
        flex: 1;
        display: flex;
        flex-direction: column;
      }

      .box {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
      }

      #box-1 {
        flex: 3;
        background-color: bisque;
      }

      #box-2 {
        flex: 1;
        background-color: burlywood;
        margin: 5px;
      }

      #box-3 {
        flex: 2;
        background-color: skyblue;
        margin: 5px;
        padding: 20px;
        box-sizing: border-box;
      }

      #box-4 {
        flex: 1;
        background-color: cyan;
        margin: 5px;
      }

      form {
        width: 100%;
      }

      .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }

      .form-group label {
        width: 200px;
        font-weight: bold;
      }

      .form-group input,
      .form-group select {
        flex: 1;
        padding: 5px;
      }

      #checkBtn {
        margin-top: 10px;
        padding: 8px 20px;
        font-size: 16px;
        background-color: dodgerblue;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      #checkBtn:hover {
        background-color: black;
      }

      .agreement {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 20px;
        font-weight: bold;
      }

      .agreement input[type="checkbox"] {
        width: 1em;
        height: 1em;
        vertical-align: middle;
      }
    </style>
  </head>

  <body>
    <h1 style="text-align: center">
      <img src="snow.svg" alt="Snow" width="500" height="50" />
    </h1>
    <h1 style="text-align: center">Air Index Quality</h1>

    <div class="container">
      <div class="column">
        <div id="box-1" class="box">
          <div class="table">
            <table>
              <thead>
                <tr>
                  <th>City</th>
                  <th>Weather</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>City1</td><td>32°C</td></tr>
                <tr><td>City2</td><td>23°C</td></tr>
                <tr><td>City3</td><td>33°C</td></tr>
                <tr><td>City4</td><td>33°C</td></tr>
                <tr><td>City5</td><td>33°C</td></tr>
                <tr><td>City6</td><td>33°C</td></tr>
                <tr><td>City7</td><td>33°C</td></tr>
                <tr><td>City8</td><td>33°C</td></tr>
                <tr><td>City9</td><td>33°C</td></tr>
                <tr><td>City10</td><td>33°C</td></tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="box-2" class="box">Box-2</div>
      </div>

      <div class="column">
        <div id="box-3" class="box">
          <form action="process.php" method="POST">
            <div class="form-group">
              <label>Full Name:</label>
              <input type="text" name="fullName" placeholder="FULL NAME" id="fullName" />
            </div>
            <div id="fullNameError" class="error-message"></div>

            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email" placeholder="Enter email" id="email" />
            </div>
            <div id="emailError" class="error-message"></div>

            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="password1" id="password1" placeholder="Enter Password" />
            </div>
            <div id="password1Error" class="error-message"></div>

            <div class="form-group">
              <label>Confirm Password:</label>
              <input type="password" name="password2" id="password2" placeholder="Enter Password" />
            </div>
            <div id="password2Error" class="error-message"></div>

            <div class="form-group">
              <label>Location:</label>
              <input type="text" name="location" placeholder="Enter Location" />
            </div>

            <div class="form-group">
              <label>Zip Code:</label>
              <input type="text" name="zipCode" placeholder="Enter Zip Code" id="zipCode" />
            </div>
            <div id="zipCodeError" class="error-message"></div>

            <div class="form-group">
              <label>Preferred City:</label>
              <select name="city" id="city">
                <option value="">--Choose a city--</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Barisal">Barisal</option>
                <option value="Rajshahi">Rajshahi</option>
              </select>
            </div>

            <div class="form-group">
              <label>Select Form Color:</label>
              <input type="color" name="color" id="color" />
            </div>

            <div class="agreement">
              I agree to the Terms and Conditions
              <input type="checkbox" name="agreement" id="checkBox" />
            </div>
            <div id="checkBoxError" class="error-message"></div>

            <button id="checkBtn" name="submit">Submit</button>
          </form>
        </div>

        <div id="box-4" class="box">Box-4</div>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
