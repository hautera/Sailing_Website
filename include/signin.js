//config firebase
var config = {
   apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
   authDomain: "husky-sailing-site.firebaseapp.com",
   databaseURL: "https://husky-sailing-site.firebaseio.com",
   projectId: "husky-sailing-site",
   storageBucket: "husky-sailing-site.appspot.com",
   messagingSenderId: "653011603129"
};

const app = firebase.initializeApp(config);
const btnLogin = document.getElementById("sign-in");

/**
 * Signs a user in after they submit their
 * sign in info
 */
 btnLogin.addEventListener('click', e => {
   //get user info
   const userEmail = document.getElementById("userEmail").value;
   const userPwd = document.getElementById("pwd").value;
   const auth = firebase.auth();

   console.log( userEmail );
   console.log( userPwd );

   const prom = auth.signInWithEmailAndPassword( userEmail, userPwd );
   prom.catch( e => {
      if(e.code == "auth/user-not-found"){	//user not found :(
         window.location.replace("localhost:8888/signin/?error=unknown-user");
      } else {	//unknown error :(
         console.log( e.message );
      }
   });
 } );
