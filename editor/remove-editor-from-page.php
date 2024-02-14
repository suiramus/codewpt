 <?php
 
 /* 
 	Remove editor for:
		- Home page
		- Contact page
 */
 
 /* 
 * Remove editor from Contact Page
 */ 
 
 function ascunde_editor_contact_page() {
    // Verifică dacă suntem pe o pagină de editare a paginii
    if (isset($_GET['post']) || isset($_POST['post'])) {
        $post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post'];
        $template = get_post_meta($post_id, '_wp_page_template', true);
        
        // Verifică dacă șablonul paginii este "page-contact.php"
        if ($template == 'page-contact.php') {
            // Dezactivează editorul pentru pagina cu acest șablon
            remove_post_type_support('page', 'editor');
        }
    }
}
add_action('admin_init', 'ascunde_editor_contact_page');


/**
 * Remove the content editor from home page
 */
function remove_editor_for_home_page() {
	if((int) get_option('page_on_front')==get_the_ID()) {
		remove_post_type_support('page', 'editor');
    }
}
add_action('admin_head', 'remove_editor_for_home_page');