function show_modal(){
	document.querySelector('.modal-menu-holder').classList.remove('hide-modal');
	document.querySelector('.modal-menu-holder').classList.add('active');
}
function close_modal(){

	document.querySelector('.modal-menu-holder').classList.remove('active');
	document.querySelector('.modal-menu-holder').classList.add('hide-modal');	
}
var close_icon = document.querySelector('.close-icon-holder');

close_icon.addEventListener('mouseenter', hover_in);
close_icon.addEventListener('mouseleave', hover_out);
close_icon.addEventListener('click', close_modal);
function hover_in(){
	document.querySelector('#close-icon-holder').classList.add('active');
}

function hover_out(){
	document.querySelector('#close-icon-holder').classList.remove('active');
}
function close_modal(){
	document.querySelector('.modal-image-container').classList.add('hidden');
}