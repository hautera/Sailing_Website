if (!firebase.apps.length) {
	var config = {
			apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
			authDomain: "husky-sailing-site.firebaseapp.com",
			databaseURL: "https://husky-sailing-site.firebaseio.com",
			projectId: "husky-sailing-site",
			storageBucket: "husky-sailing-site.appspot.com",
			messagingSenderId: "653011603129"
	};

	firebase.initializeApp(config);
}

var db = firebase.firestore();

var form = document.getElementById("submit");

form.addEventListener( 'click', e => {
	var data ={
		name: document.getElementById('firstname').value + " " + document.getElementById('lastname').value,
		phone_number: document.getElementById('phone').value,
		email: document.getElementById("signup_email").value,
		role: "",
		bio: false
	};
	var first_name = document.getElementById('firstname').value;
	var email = document.getElementById("signup_email").value;
	var pwd = document.getElementById("signup_pwd").value;
	//register user using firebase

	firebase.auth().createUserWithEmailAndPassword( email, pwd ).then( e => {
		var user = firebase.auth().currentUser;
		//add username
		user.updateProfile({
				displayName: first_name
		});

		db.collection("sailors").add( data ).then( docref => {
			console.error("Data success :)");
		}).catch( error => {
			console.error( e.message );
		});

		user.sendEmailVerification().then( e => {
			window.location.replace("/uwsails/signup/verify");
		}).catch( e =>{
			console.error( e.message );
			window.location.replace("/uwsails/joinus/newsailor?error="+e );
		});

	}).catch( e =>{
		console.error(e.message);
		window.location.replace("/uwsails/joinus/newsailor?error="+e );
	});
});
