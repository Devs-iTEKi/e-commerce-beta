<?php

namespace App\Admin\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use \App\Models\Producto;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Controllers\AdminController;

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

        // Mostrar el nombre de la categoría en lugar del ID
        // $grid->column('categoria.nombre', __('Categoria'));

        // Mostrar el nombre de la marca en lugar del ID
        // $grid->column('marca.nombre', __('Marca'));

        // Realizar el JOIN con la tabla Categorias
        // $grid->joinTable('Categorias', 'id_categoria', 'Categorias.id', function ($join) {
        //     $join->column('nombre')->display('Categoria');
        // });

        // Realizar el JOIN con la tabla Marcas
        // $grid->joinTable('Marcas', 'id_marca', 'Marcas.id', function ($join) {
        //     $join->column('nombre')->display('Marca');
        // });
        

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
        // $form->select('id_categoria', __('categoria'));
        // $form->select('id_marca', __('marca'));
        // Obtener todas las categorías y marcas para mostrarlas en el select
        $categorias = Categoria::all()->pluck('nombre', 'id')->toArray();
        $marcas = Marca::all()->pluck('nombre', 'id')->toArray();

        $form->select('id_categoria', __('Categoria'))->options($categorias);
        $form->select('id_marca', __('Marca'))->options($marcas);

        return $form;
    }
}
