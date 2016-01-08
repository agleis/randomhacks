<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Profile</title>
        <link rel="Stylesheet" type = "text/css" href = "../../css/main_style.css">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://www.parsecdn.com/js/parse-latest.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="url_get.js"></script>
		<script>
			
			var user_id = getUrlVars()["user_id"];
			
			function initialize() {
				Parse.initialize("Wc1q7sHJ3vbi8UQcLckBB86SnkZGeGwdxXpowDzg", "PXNmpPhmuH6UAM6cX0KRITpyjwKQ1oM2oDuasUuu");
				pullPosts();
			}
			
			function getFriends() {
				var query = new Parse.Query(Parse.User);
				query.get(user_id, {
					success: function(user) {
						var relation = user.get("Friends");
						var rquery = relation.query();
						rquery.find({
							success: function(list) {
								return list;
							}
						});
					}
				});
			}
			
			function pullPosts() {
				var query = new Parse.Query(Parse.User);
				query.get(user_id, {
					success: function(user) {
						var relation = user.get("Posts");
						var query1 = relation.query();
						query1.find({
							success: function(list) {
								var innerH = "";
								var append = "";
								var i;
								for(i = 0; i < list.length; i++) {
									var post = list[i];
									innerH = document.getElementById("user_feed").innerHTML;
									var date = JSON.stringify(post.get("createdAt"));
									var month = date.substr(6, 2);
									if(month == 1) month = "January";
									else if(month == 2) month = "February";
									else if(month == 12) month = "December";
									else if(month == 3) month = "March";
									else if(month == 4) month = "April";
									else if(month == 5) month = "May";
									else if(month == 6) month = "June";
									else if(month == 7) month = "July";
									else if(month == 8) month = "August";
									else if(month == 9) month = "September";
									else if(month == 10) month = "October";
									else if(month == 11) month = "November";
									var year = date.substr(1, 4);
									var day = date.substr(9, 2);
									append = "<div class='post'><img src='"+user.get("ProfilePic")+"' height='30' width='30'>"+month+" "+day+", "+year+"<br>"+post.get("Content")+"<br /></div>";
									if(post.get("Image") != "") append += "<img src="+post.get("Image")+"> </div>";
									document.getElementById("user_feed").innerHTML = append + innerH;
								}
							}
						});
					},
					error: function(object, error) {
						
					}
				});
			}
			
			function createPage() {
				var query = new Parse.Query(Parse.User);
				query.get(user_id, {
					success: function(user) {
						if(Parse.User.current().id != user_id) document.getElementById("bar").innerHTML = "<button id='add_friend' onclick='addFriend()'>Add Friend</button>";
						var append = "";
						append = "<img src='"+user.get("ProfilePic")+"' height='280' width='200' /><button type='button' onclick='location.href='user_edit.html''>Edit</button>";
						document.getElementById("profile_pic").innerHTML = append;
						append = "<h1 id='uname'>"+user.get("username")+"</h1>";
						document.getElementById("nameContainer").innerHTML = append;
						append = "<h2>About Me</h2><p>"+user.get("About")+"</p>";
						document.getElementById("aboutme").innerHTML = append;
						var skills = new Array();
						skills = user.get("Skills");
						append = "<h2>My Skills</h2><ul>"
						for(var i = 0; i < skills.length; i++) {
							append += "<li>"+skills[i]+"</li>";
						}
						append += "</ul>";
						document.getElementById("skills").innerHTML = append;
						var friends = getFriends();
						alert(friends);
						append = "<div class='info_section'><h2>Friends</h2><br />";
						var i;
						for(i = 0; i < friends.length; i++) {
							friend = friends[i];
							append += "<a href='profile.php?user_id="+friend.id+"'><img src='"+friend.get("ProfilePic")+"' height='100' width='100'/></a>";
						}
						append += "</div>";
						document.getElementById("friends").innerHTML = append;
					}
				});
			}
			
			function addFriend() {
				var user = Parse.User.current();
				var relation = user.get("Friends");
				var query = new Parse.Query(Parse.User);
				query.get(user_id, {
					success: function(page_user) {
						relation.add(page_user);
						user.save();
					}
				});
			}
		</script>
    </head>
    <body>
        <script>initialize()</script>
        <div id="title">
			<a href="../Prelogin/home.html"><img src="../../img/logo.png" height="60px" /><h3>Coding Connection</h3></a>
			<ul class="nav-links">
				<li><a href="main_feed.html">Home</a></li>
                <li><a href="message.html">Messages</a></li>
                <li><a href="events.html">Events</a></li>
               	<li><a href="groups.html">Groups</a></li>
                <li><a href="profile.php?user_id=gBuzWtppGx">My Profile</a></li>
                <li><a href="../Prelogin/home.html">Log Out</a></li>
            </ul>
		</div>


        <div class="container">
    		<div id = "nameContainer">
             
            </div>

            <div id="profile_pic">
			
            </div>
			<div id="bar">
			
			</div>
            <div id= "user_feed">

            </div>

            <div id="user_info">
              <div id="friends" class = "info_section">
				
              </div>
		      <div id="aboutme" class="info_section">
					
			  </div>
              <div id="skills" class = "info_section">
                
              </div>   
              <div class = "info_section">
            <h2>External Profiles</h2>
            <p><br /><a href="">Adam's Git Profile</a></p>
              </div>        
                    
            </div>
        </div>

      <footer>
    <p>Copyright 2015, Coding Connectors Inc.</p>
  </footer>
	<script>createPage()</script>
    </body>
</html>