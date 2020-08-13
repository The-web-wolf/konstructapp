<script type="text/javascript">
	function refreshLikes(ref_item){
		let user 				= Cookies.get('_id');
		let likeBtn 		= $(document).find(`.likeBtn`);	
		let likeText		= $(document).find(`.likeText`);
		let user_id			= Cookies.get('_id');
		let user_liked 	= ref_item.likes.includes(user_id);	// check if user id is in the array of likes
		let likes_count = ref_item.likes.length

		if (user_liked) {
			if($(likeText).hasClass(ref_item._id)){
				$(document).find(`.likeText.${ref_item._id}`).addClass('liked')
				$(document).find(`.likeText.${ref_item._id} span`).html(`${likes_count} like(s)`)
			}
			if($(likeBtn).hasClass(ref_item._id)){
				$(document).find(`.likeBtn.${ref_item._id}`).addClass('liked')
			}
		}	
	}	
</script>