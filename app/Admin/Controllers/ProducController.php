<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Produc;

class ProducController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produc';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Produc());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('descripcion', __('Descripcion'));
        $grid->column('precio', __('Precio'));
        $grid->column('stock', __('Stock'));
        $grid->column('imagen', __('Imagen'));
        $grid->column('id_categorias', __('Id categorias'));
        $grid->column('id_marcas', __('Id marcas'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Produc::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('descripcion', __('Descripcion'));
        $show->field('precio', __('Precio'));
        $show->field('stock', __('Stock'));
        $show->field('imagen', __('Imagen'));
        $show->field('id_categorias', __('Id categorias'));
        $show->field('id_marcas', __('Id marcas'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Produc());

        $form->text('nombre', __('Nombre'));
        $form->text('descripcion', __('Descripcion'));
        $form->decimal('precio', __('Precio'));
        $form->number('stock', __('Stock'));
        $form->image('imagen', __('Imagen'));
        $form->select('id_categorias', __('Id categorias'));
        $form->select('id_marcas', __('Id marcas'));

        return $form;
    }
}
