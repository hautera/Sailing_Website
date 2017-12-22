//connect to firebase if not already
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

var upload_form = document.getElementById('start_upload');

upload_form.addEventListener( 'click',
	function(event){
		//get file
		var file = document.getElementById('sheet_to_upload').files.item(0);

		//this checks if the user is signed in :)
		if( firebase.auth().currentUser ){
			console.log("Hello!")
			var storage = firebase.storage();
			var sheets_ref = storage.ref().child("sheets/sheet.xlsx");
			//upload the file
			sheets_ref.put( file ).then( x => {
				document.getElementById('upload_form_space').innerHTML = "<h3>File successfully uploaded!</h3>";
			});
		} else {
			//bad times something went really wrong here
			console.error("User is not signed in!");
		}
});
