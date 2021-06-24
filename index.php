<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <style>
      @media screen and (min-width: 600px) {
        .ab{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        }
      }
  
      body{
        background-color: #efeff6;
      }
    </style>
  </head>
  <body>

    <!-- Start your project here-->
    <div class="">
      <div class="">
        
        <div class="col-md-4 ab">
        <div class="col-md-12 text-center p-4">
          <img src="img/best-website-development-company2.png" alt="">
        </div>
        <div class="card">
          <div class="card-body"> 
          <form id="myForm" class="nouse" name="myForm" method="POST">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="name" id="form6Example1" class="form-control" />
        <label class="form-label" for="form6Example1">Full Name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" name="pincode" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">Pin-Code</label>
  </div>


  <div class="form-outline mb-4">
    <label class="form-check-label"> Age</label>
      <div class="form-check form-check-inline ms-3">
      <input class="form-check-input"type="radio"name="under18"id="inlineRadio1" value="1" checked/>
      <label class="form-check-label" for="inlineRadio1">18</label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input"type="radio"name="under18"id="inlineRadio2"value="0"/>
        <label class="form-check-label" for="inlineRadio2">45</label>
      </div>
  </div>
<!-- Dose -->
  <div class="form-outline mb-4">
    <label class="">Dose</label>
  <div class="form-check form-check-inline ms-3">
  <input class="form-check-input"type="radio"name="doseType"id="inlineRadio3" value="1" checked/>
  <label class="form-check-label" for="inlineRadio3">1</label>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input"type="radio"name="doseType"id="inlineRadio4"value="0"/>
    <label class="form-check-label" for="inlineRadio4">2</label>
  </div>
  </div>
<!-- Free/Paid -->
  <div class="form-outline mb-4">
    <label class=""> Free/Paid</label>
  <div class="form-check form-check-inline ms-3">
  <input class="form-check-input"type="radio"name="paidType"id="inlineRadio5" value="1" checked/>
  <label class="form-check-label" for="inlineRadio5">Free</label>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input"type="radio"name="paidType"id="inlineRadio6"value="0"/>
    <label class="form-check-label" for="inlineRadio6">Paid</label>
  </div>
  </div>
       

<input id="token" name="token" type="hidden" value="">

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4 vaccdata">Submit</button>
</form>
      </div>
      </div>
        </div>
      </div>

    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Custom scripts -->
 
    <script>
            MsgElem = document.getElementById('msg');
            TokenElem = document.getElementById('token');
            NotisElem = document.getElementById('notis');
            ErrElem = document.getElementById('err');
var firebaseConfig = {
                    apiKey: "AIzaSyCW13S675lY6uklS-icP3DdyH9RhAAM-Qc",
                    authDomain: "vaccinenotificaton.firebaseapp.com",
                    projectId: "vaccinenotificaton",
                    storageBucket: "vaccinenotificaton.appspot.com",
                    messagingSenderId: "612699568652",
                    appId: "1:612699568652:web:1adec638d5bd31610d0c29"
        };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
            

            const messaging = firebase.messaging();
            messaging
                .requestPermission()
                .then(function () {
                    // MsgElem.innerHTML = 'Notification permission granted.';
                    console.log('Notification permission granted.');

                    // get the token in the form of promise
                    return messaging.getToken();
                })
                .then(function (token) {
                    TokenElem.value = token;
                })
                .catch(function (err) {
                    // ErrElem.innerHTML = ErrElem.innerHTML + '; ' + err;
                    console.log('Unable to get permission to notify.', err);
                });

            let enableForegroundNotification = true;
            messaging.onMessage(function (payload) {
                console.log('Message received. ', payload);
                NotisElem.innerHTML =
                    NotisElem.innerHTML + JSON.stringify(payload);
                if (enableForegroundNotification) {
                    let notification = payload.notification;
                    navigator.serviceWorker
                        .getRegistrations()
                        .then((registration) => {
                            registration[0].showNotification(notification.title);
                        });
                }
            });
        


            $(document).ready(function () {
             
              $(".vaccdata").click(function (e) {
                e.preventDefault();
                inputs={};
                    input_serialized =  $(this).parents('#myForm').serializeArray();
                    input_serialized.forEach(field => {
                      inputs[field.name] = field.value;
                    })
                    console.log(inputs)
         
      
              
         
                let myForm = document.getElementById('myForm');
                let formData = new FormData(myForm);
                // const data = {inputs};

fetch('https://vaccinetouchmedia.herokuapp.com/registerForVaccine', {
  method: 'POST', // or 'PUT'
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(inputs),
})
.then(response => response.json())
.then(data => {
  console.log('Success:', data);
  if(data['msg'] == 'Data Created'){
                $(".nouse").addClass("d-none")
              $(".card-body").html('<div class="alert alert-success text-center" role="alert">Registration successfully</div>');
  }
      // console.log(data['msg'])
})
.catch((error) => {
  console.error('Error:', error);
});
              });


            });
    </script>

  
  </body>
</html>
