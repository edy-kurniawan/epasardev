<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploads 
{
    
    var $CI = null;

    function __construct() 
    {
        $this->CI =& get_instance();
    }

    public function upload($paths, $index, $type = NULL, $name = NULL
                            , $overwrite = FALSE, $resize = FALSE, $keep = TRUE)
    {

        define('DEFAULT_UP_SIZE', 5120);
        define('DEFAULT_IMG_SIZE', 2048);
        define('ATTACH_EXT_UPLOAD', 'jpg|jpeg|png|gif|zip|rar');

        $result['status'] = FALSE;
        $result['reason'] = 'no_file';

        $target = $paths;

        if(isset($_FILES[$index]) && $_FILES[$index]['error'] == 0)
        {
            //PREPARING UPLOAD CONFIG
            $allowed_type = NULL;
            $max_size = DEFAULT_UP_SIZE;

            switch($type)
            {
                case 'image':
                    $allowed_type = 'gif|jpg|jpeg|png';
                    $max_size = DEFAULT_IMG_SIZE;
                    break;

                case 'video':
                    $allowed_type = 'mp4|m4v|f4v|mov|webm|ogg|flv';
                    break;

                case 'multi':
                    $allowed_type = 'mp4|webm|ogg|mov|gif|jpg|jpeg|png|doc|docx|zip|xls|xlsx|pdf|rar';
                    break;
                default :
                    $allowed_type = ATTACH_EXT_UPLOAD;
                    break;
            }

            $up_conf['upload_path']            = $target;
            $up_conf['max_size']               = $max_size;
            $up_conf['file_ext_tolower']       = TRUE;
            $up_conf['max_filename_increment'] = 1000;

            if($allowed_type)
                $up_conf['allowed_types']      = $allowed_type;

            if($name && strlen($name) > 0)
                $up_conf['file_name']          = $name;

            if($overwrite)
                $up_conf['overwrite']          = TRUE;

            if($name === NULL OR strlen($name) == 0)
                $up_conf['encrypt_name']       = TRUE;

            if(!class_exists('upload'))
                $this->CI->load->library('upload');

            $this->CI->upload->initialize($up_conf);

            //PREPARING RESIZE CONFIG
            if($resize && $type == 'image')
            {
                $res_conf['image_library']   = 'gd2';
                $res_conf['source_image']    = $target . DIRECTORY_SEPARATOR;
                $res_conf['thumb_marker']    = '';
                $res_conf['create_thumb']    = TRUE;
                $res_conf['maintain_ratio']  = TRUE;
                $res_conf['width']           = 250;
                $res_conf['height']          = 250;

                if($keep)
                    $res_conf['new_image']   = $target . DIRECTORY_SEPARATOR . 'thumb_';
            }


            //DOING UPLOAD
            if($overwrite && $name)
            {
                $ex = glob($target . DIRECTORY_SEPARATOR . $name . '.*');
                if($ex)
                    unlink ($ex[0]);

                $ex = glob($target . DIRECTORY_SEPARATOR . 'thumb_' . $name . '.*');
                if($ex)
                    unlink ($ex[0]);
            }

            if($this->CI->upload->do_upload($index))
            {
                $uploaded_data = $this->CI->upload->data();
                $result['file_name'] = $uploaded_data['file_name'];
                $result['reason'] = 'ok';

                if($resize && $type == 'image')
                {
                    $res_conf['source_image']  .= $uploaded_data['file_name'];
                    if($keep)
                        $res_conf['new_image'] .= $uploaded_data['file_name'];

                    if(!class_exists('image_lib'))
                        $this->CI->load->library('image_lib');

                    $this->CI->image_lib->initialize($res_conf);

                    if($this->CI->image_lib->resize())
                    {
                        $result['status'] = TRUE;
                    }
                    else
                    {
                        if(file_exists($target . $uploaded_data['file_name']))
                            unlink ($target . $uploaded_data['file_name']);

                        $result['reason'] = 'thumb_faild';
                    }
                }
                else
                    $result['status'] = TRUE;
            }
            else
                $result['reason'] = $this->CI->upload->display_errors();
        }

        return $result;
    }

    public function multi_upload($paths, $index, $type = NULL)
    {
        $file_uploaded  = array();
        $file_faild     = array();

        $files          = $_FILES;
        $total          = count($_FILES[$index]['name']);
        $uploaded       = 0;
        $faild          = 0;

        for($i = 0; $i < $total; $i++)
        {
            $_FILES[$index]['name']     = $files[$index]['name'][$i];
            $_FILES[$index]['type']     = $files[$index]['type'][$i];
            $_FILES[$index]['tmp_name'] = $files[$index]['tmp_name'][$i];
            $_FILES[$index]['error']    = $files[$index]['error'][$i];
            $_FILES[$index]['size']     = $files[$index]['size'][$i];

            $result = $this->upload($paths, $index, $type);

            if(isset($result['status']) AND $result['status'])
            {
                $name       = $result['file_name'];
                array_push($file_uploaded, $name);
                $uploaded++;
            }
            else
            {
                $name = $_FILES[$index]['name'];
                array_push($file_faild, $name);
                $faild++;
            }
        }

        if($faild + $uploaded != $total)
            $faild = $total - $uploaded;

        return array(
            'total'         =>  $total,
            'uploaded'      =>  $uploaded,
            'faild'         =>  $faild,
            'file_uploaded' =>  $file_uploaded,
            'file_faild'    =>  $file_faild
        );

    }

}