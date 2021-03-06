<?
class MediaAlbumAdminController extends AdminController
{
    public static function actionsTitles()
    {
        return [
            "create" => "Создать",
            "view"   => "Создать",
            "delete" => "Удалить",
            "update" => "Редактировать",
            "manage" => "Управление альбомами",
        ];
    }


    public function actionCreate()
    {
        $model = new MediaAlbum;
        $form  = new Form('media.AlbumForm', $model);

        $this->performAjaxValidation($model);

        if ($form->submitted('submit') && !$model->validate())
        {

        }

        if ($model->userCanEdit())
        {
            $model->save(false);
        }
        else
        {
            $this->forbidden();
        }
    }


    public function actionView($id)
    {
        $this->layout     = '//layouts/middle';
        $model            = $this->loadModel($id);
        $this->page_title = 'Альбом: ' . $model->title;
        $form             = new Form('Media.UploadFilesForm', $model);
        $this->render('view', [
            'model' => $model,
            'form'  => $form
        ]);
    }


}
