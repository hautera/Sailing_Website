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

firebase.auth().onAuthStateChanged(function(user) {
	 if (user) {
		 db.collection('sailors').where('email', '==', user.email ).get().then(
			function( users_info ){
				console.log(users_info);
			 	if(users_info.docs.length != 1 ){
					console.error("Panic!");
				} else{
					//everything is working fine
					var user_info = users_info.docs[0];
					document.getElementById("welcome").innerHTML += user_info.get('name') + ":";
					var user_role = user_info.get('role');
					console.log(user_role);
					if( user_role !== "" ){
						switch (user_role) {
							case "Admin":
								console.log("Austin is the best :)");
								admin(user, user_info);
								break;
							case "Treasurer":
								treasurer(user, user_info);
								break;
							default:
								break;
						}
					}
				}
		 		}).catch(
					function( e ){
						console.error(e);
					}
				);
	 }	else {
		 console.error("This Motherfucker shouldn't be vewing this page!")
	 }
});

function admin(user, user_info){
	document.getElementById('role').innerHTML ="Site Admin";
}

function treasurer(user, user_info){
	document.getElementById('role').innerHTML ="Treasurer";
	document.getElementById('upload_form_space').innerHTML =
			"<form id='upload_form'><p><strong>Upload a spreadsheet:</strong></p><input type='file'  id='sheet_to_upload' class='big-form'></input><input type='button' id='start_upload' value='Upload Sheet' class='big-btn'></input><script src=''/include/upload_ss.js'></script></form>";

	//TODO Download current sheet button/link :)
}
