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

POST:

Content - String - the actual content of the post
Title - String - the title of the post (including username?)
Poster - Pointer<User> - points to the user that posted said post
Image - String - If there is an image associated with the post, this contains its URL
Video - String - If there is a video associated with the post, this contains its URL