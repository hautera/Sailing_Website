var submit_button = document.getElementById('submit');

// Initialize Firebase
var config = {
apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
authDomain: "husky-sailing-site.firebaseapp.com",
databaseURL: "https://husky-sailing-site.firebaseio.com",
projectId: "husky-sailing-site",
storageBucket: "husky-sailing-site.appspot.com",
messagingSenderId: "653011603129"
};
firebase.initializeApp(config);

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
      //define all the users data to be stored in database
      const data = {
            name: first_name +" "+last_name,
            bio_pic: "",
            bio: false,
            bio_text: "",
            email: user_email,
            phone_number:"",
            role: ""
      };

      var prom = auth.createUserWithEmailAndPassword( user_email, user_pwd ).then( function( e ){
         //IF SIGN UP SUCCESS
         var user = firebase.auth().currentUser;
         //add username
         user.updateProfile({
               displayName: first_name
         });

         //adds the user to the database
         var db = firebase.firestore();
         db.collection("sailors").add(data
         ).then(docref =>{console.error("Data success :)");}).catch(error => {console.error(e.message);});  //logs error message if the fucking database doesnt work

         //sends a verification email @hayden
         user.sendEmailVerification().then( e => {
            var db = firebase.firestore();
            window.location.replace("/uwsails/signup/verify/");
         });
      }).catch( function( e ){
         //IF SOMEONE FUCKED UP
         console.log( e.message); 
         document.getElementById("Error-Text").innerHTML = e.message;

      });
   }
});
