<?php
class Photo extends DBObject {
	protected static $db_table = "photos";
	protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
	public $photo_id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;
	public $tmp_path;
	public $upload_dir = "images";
	public $custom_errors = array();
	public $upload_errors_array = array(
		UPLOAD_ERR_OK => "There is no error",
		UPLOAD_ERR_INI_SIZE => "Upload exeeds limit",
		UPLOAD_ERR_FORM_SIZE => "Upload exeeds max file size",
		UPLOAD_ERR_PARTIAL => "we only got part of the file",
		UPLOAD_ERR_NO_FILE => "No File was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing /tmp...that's bad",
		UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
		UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
	);
	//


}
?>
