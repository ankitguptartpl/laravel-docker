<?php
/**
 * function to modify assets url for public redirects
 * @param $url
 * @return string
 */
function assets($url)
{
    return asset($url);
}


if(!function_exists('get_user_by_id')) {
    /**
     * function to get any user data by the primary key id
     * @param $user_id
     * @return object
     */
    function get_user_by_id($user_id) {
        return \App\Data\Models\User::find($user_id);
    }
}


if (! function_exists('menuActive')) {

    /**
     * menuActive()
     *
     * @purpose : This function is used to make link active and inactive
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov 2020, at 12:57
     * @param string $route_name This is name of route
     * @return string
     */
    function menuActive($route_name)
    {
        return Route::currentRouteName() == $route_name ? 'active' : '';
    }

}

if (! function_exists('file_upload_by_ckeditor')) {
    /**
     * file_upload_by_ckeditor()
     *
     * @purpose : This function is used to upload file by ckeditor
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov 2020, at 12:57
     * @param object $request
     * @return string
     */
    function file_upload_by_ckeditor($request) {

        if($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName.'_'.time().'.'.$extension;



            $request->file('upload')->move(public_path('uploads'), $fileName);
            //$request->file('upload')->storeAs('public/images', $fileName);



            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('uploads/'.$fileName);

            $msg = 'File uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');

            return $response;

        }
    }
}

if(!function_exists('created_by_and_updated_by')){
    /**
     * file_upload_by_ckeditor()
     *
     * @purpose : This function is used to get created_by and updated_by user
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov 2020, at 17::20
     * @param boolean
     * @return array
     */
    function created_by_and_updated_by($for_both=true) {

        if($for_both) {
            return [
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ];
        }
        else {
            return [
                'updated_by' => auth()->id()
            ];
        }

    }
}
