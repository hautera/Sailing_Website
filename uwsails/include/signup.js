var config = {
   apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
   authDomain: "husky-sailing-site.firebaseapp.com",
   databaseURL: "https://husky-sailing-site.firebaseio.com",
   projectId: "husky-sailing-site",
   storageBucket: "husky-sailing-site.appspot.com",
   messagingSenderId: "653011603129"
};

const app = firebase.initializeApp(config);

const submit_button = document.getElementById('submit');

/**
 * Creates a user with the email, password and name :)
 * After creating the user, this function sends a verification email
 * and takes the user to a verify email page.
 * Returns true if there are no errors, false if there are.
 */
submit_button.addEventListener( 'click', function(e) {
   //instalize that there constants
   var first_name = document.getElementById("firstname").value;
   var last_name = document.getElementById("lastname").value;
   var user_email = document.getElementById("signup_email").value;
   var user_pwd = document.getElementById("signup_pwd").value;
   var auth = firebase.auth();

   console.log( user_pwd );
   if( user_pwd.length > 6 ){

      auth.createUserWithEmailAndPassword( user_email, user_pwd ).catch( function( e ){
         console.log("Fuck this shit I'm out: " + e.message); //todo maybe make the log more sober
         window.location.replace("localhost:8888/signup/");
      });

      var user = auth.currentUser;
      if( user != null ) {
         //add username
         user.updateProfile({
            displayName: first_name + " " + last_name,
            photoURL: ""
         });

         //sends a verification email @hayden
         user.sendEmailVerification()
         .then( e => {
            window.location.replace("localhost:8888/signup/verify/");
         });
      } else {
         console.log("This motherfucker isn't signed in >:(");
      }
   }
});
