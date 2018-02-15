<template id="obvbtn-template">

	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#obvmodal" @click="modimg = obvimg">View Image
	</button>

</template>

<script>

export default{
	
	props: [obvimg],

	template: '#obvbtn-template',

	data: function(){

		return {
		
			obvimg: ''

		}
	}



};

</script>