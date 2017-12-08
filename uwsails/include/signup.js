var submit_button = document.getElementById('submit');

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

   if( user_pwd.length <= 6 ){
      document.getElementById("Error-Text").innerHTML = "PASSWORD IS NOT STRONG ENOUGH";
      return;
   } else if (first_name == ""){
      document.getElementById("Error-Text").innerHTML = "ENTER A FIRST NAME";
      return;
   } else  if(last_name == ""){
      document.getElementById("Error-Text").innerHTML = "ENTER A LAST NAME";
      return;
   } else {
      var prom = auth.createUserWithEmailAndPassword( user_email, user_pwd ).then( function( e ){
         //IF SIGN UP SUCCESS
         //add username
         user.updateProfile({
            displayName: first_name + " " + last_name,
            photoURL: ""
         });

         //sends a verification email @hayden
         user.sendEmailVerification().then( e => {
            window.location.replace("/uwsails/signup/verify.php");
         });
      }).catch( function( e ){
         //IF SOMEONE FUCKED UP
         console.log("Fuck this shit I'm out: " + e.message); //todo maybe make the log more sober
         document.getElementById("Error-Text").innerHTML = e.message;

      });
   }
});
