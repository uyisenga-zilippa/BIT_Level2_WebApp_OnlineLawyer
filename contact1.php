<!DOCTYPE html>
<html>

<head>
    <title>staff</title>
    <style>
        body {

            background-color: grey;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        #wrapper {
            width: 30%;
            margin: 0 auto;

        }

        form {
            background: ;
        }

        #titleRegistration {
            text-align: center;
            font-size: 30px;
            color: whitesmoke;
        }

        #userInformation {
            border: 1px solid whitesmoke;
            border-bottom: none;
        }

        legend {
            font-weight: bold;
            font-size: 24px;
            color: whitesmoke;
        }

        .divInformation {
            width: 100%;
            height: 75px;
        }

        .divInformation div {
            width: 51%;
            height: 25%;
            float: right;
        }

        .divInformation div p {
            color: rgb(248, 1, 1);
            width: 100%;
            height: 100%;
            float: right;
            font-size: 12px;
            margin-top: 0px;
            text-align: center;
        }

        .label {
            color: whitesmoke;
            height: 30%;
            font-weight: bold;
            font-size: 20px;
        }

        .input {
            margin-top: 2px;
            border-radius: 3px;
            text-align: center;
            height: 25%;
            width: 50%;
            float: right;
            background-color: white;
            border: 1px solid grey;
        }

        #nextStep {
            border: 1px solid whitesmoke;
            border-top: none;
            border-top: none;
            text-align: center;
        }

        #nextStepBtn {
            background-color: rgb(145, 5, 5);
            height: 50px;
            width: 150px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
        }

        #nextStepBtn:hover {
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div id="wrapper">
        <h2 id="titleRegistration">GET IN TOUCH</h2>
        <form>
            <fieldset id="userInformation">
                <legend>Give your feedback</legend><br>

                <div class="divInformation">
                    <label class="label" for="firstName">First Name:</label>
                    <input type="text" id="firstName" class="input" placeholder="Only letters allowed" autocomplete="off" />

                </div>

                <div class="divInformation">
                    <label class="label" for="lastName">Last Name:</label>
                    <input type="text" id="lastName" class="input" placeholder="Only letters allowed" autocomplete="off" />
                </div>

                <div class="divInformation">
                    <label class="label" for="email">Email Address:</label>
                    <input type="text" id="email" class="input" placeholder="Type a valid email address" autocomplete="off" />
                </div>


            </fieldset>

            <fieldset id="nextStep">
                <button id="nextStepBtn">Submit</button>
            </fieldset>


        </form>
    </div>

</body>