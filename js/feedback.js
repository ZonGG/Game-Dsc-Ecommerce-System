
function validate() {
  var star= document.feedback.Rating;
  var review= document.feedback.Comment;


  function trimfield(str)
  {
      return str.replace(/^\s+|\s+$/g,'');
  }



if (star.value == "")
  {alert( "Your star rating is empty!");
   return false;}

if (trimfield(review.value) == "")
  {alert( "Your review cannot be empty! We need your valuable opinion!");
  review.focus(); return false;}


}
