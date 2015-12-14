# randomhacks

Implementation of the backend (For use in Parse JavaScript calls)
(I include the important fields here - for the others, check out the Parse dashboard).

USER:

objectId - String - unique identifier for each user
emailVerified - Boolean - tells whether the user's login has been verified
username - String - a user-defined identifier (shuold also be unique)
password - String - used as a password, surprisingly
email - String - c'mon, you know this one
FirstName - String - The first name of the user
LastName - String - The last name of the user
Posts - Relation - essentially, an array of pointers to posts related to that user.
Friends - Relation - basically an array of people this users is friends with
ProfilePic - String - the URL of this user's profile picture
About - String - Fills in the "About me" section of their user page
Skills - Array - Fills in the skills section

POST:

Content - String - the actual content of the post
Title - String - the title of the post (including username?)
Poster - Pointer<User> - points to the user that posted said post
Image - String - If there is an image associated with the post, this contains its URL
Video - String - If there is a video associated with the post, this contains its URL

GROUP:

Name - String - The name of the group
Posts - Relation - Posts made by this group
Members - Relation - Users in this group
Picture - String - the URL of the profile pic of this group
About - String - Fills in the "About Group" section of the page
Events - Relation - Events this group is hosting