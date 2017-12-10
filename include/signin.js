//config firebase
var config = {
   apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
   authDomain: "husky-sailing-site.firebaseapp.com",
   databaseURL: "https://husky-sailing-site.firebaseio.com",
   projectId: "husky-sailing-site",
   storageBucket: "husky-sailing-site.appspot.com",
   messagingSenderId: "653011603129"
};

firebase.initializeApp(config);
var btnLogin = document.getElementById("sign-in");

/**
 * Signs a user in after they submit their
 * sign in info
 */
 btnLogin.addEventListener('click', e => {
   //get user info
   const userEmail = document.getElementById("userEmail").value;
   const userPwd = document.getElementById("pwd").value;
   const auth = firebase.auth();

   //debug, maybe don't publish this to internet
   //console.log( userEmail );
   //console.log( userPwd );

   auth.signInWithEmailAndPassword( userEmail, userPwd )
   .then( user => {
      //window.location.replace("/uwsails/account.php");
   })
   .catch( e => {
      document.getElementById("error-text").innerHTML = "ERROR SIGNING IN";
   });
 } );
