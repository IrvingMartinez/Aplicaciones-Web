<?php
class Upload {

    private $fileName;
    private $tempName;
    private $fileType;
    private $fileSize;
    private $uploadDirectory;
    private $validExtensions;
    private $maximumFileSize;

    public function SetFileName($argv) {
	$this->fileName = substr(md5(uniqid(rand())), 0, 10) . '-' . $argv;
    }

    public function SetTempName($argv) {
	$this->tempName = $argv;
    }

    public function SetFileType($argv) {
	$this->fileType = $argv;
    }

    public function SetFileSize($argv) {
	$this->fileSize = $argv;
    }

    public function SetUploadDirectory($argv) {
	$this->uploadDirectory = $argv;
    }

    public function SetValidExtensions($argv) {
	$this->validExtensions = $argv;
    }

    public function SetMaximumFileSize($argv) {
	$this->maximumFileSize = $argv;
    }

    public function UploadFile() {
	if (empty($this->validExtensions)):
	    $return = array(
		'type' => 'error',
		'error' => 'Debe especificar extenciones validas.'
	    );
	else:
	    $parts = explode('/', $this->fileType);

	    if (in_array($parts[1], $this->validExtensions)) {
		if ($this->fileSize < $this->maximumFileSize || $this->maximumFileSize == 'unlimited'):
		    if (@copy($this->tempName, $this->uploadDirectory . '/' . $this->fileName)):
			$return = array(
			    'type' => 'successful',
			    'message' => $this->fileName
			);
		    else:
			$return = array(
			    'type' => 'error',
			    'message' => 'No se pudo guardar'
			);
		    endif;
		else:
		    $return = array(
			'type' => 'error',
			'message' => 'El archivo es mas grande'
		    );
		endif;
	    }
	    else {
		$return = array(
		    'type' => 'error',
		    'message' => 'El archivo no esta permitido'
		);
	    }

	    return $return;
	endif;
    }

}
