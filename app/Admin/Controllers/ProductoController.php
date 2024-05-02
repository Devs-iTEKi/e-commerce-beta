<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Producto;

class ProductoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Producto';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Producto());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('descripcion', __('Descripcion'));
        $grid->column('precio', __('Precio'));
        $grid->column('stock', __('Stock'));
        // $grid->column('imagen', __('Imagen'));
        $grid->column('imagen')->image();
        $grid->column('id_categoria', __('Id categoria'));
        $grid->column('id_marca', __('Id marca'));
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
        $show = new Show(Producto::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('descripcion', __('Descripcion'));
        $show->field('precio', __('Precio'));
        $show->field('stock', __('Stock'));
        $show->field('imagen', __('Imagen'));
        $show->field('id_categoria', __('Id categoria'));
        $show->field('id_marca', __('Id marca'));
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
        $form = new Form(new Producto());

        $form->text('nombre', __('Nombre'));
        $form->text('descripcion', __('Descripcion'));
        $form->decimal('precio', __('Precio'));
        $form->number('stock', __('Stock'));
        $form->image('imagen', __('Imagen'));
        $form->number('id_categoria', __('Id categoria'));
        $form->number('id_marca', __('Id marca'));

        return $form;
    }
}
