<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '
                <a href="' . route("admin.product-variant-item.index", ["productId" => request()->product, "variantId" => $query->id]) . '" class="btn btn-primary-gradient btn-wave waves-effect waves-light" title="Thêm Sản Phẩm"><i class="far fa-plus"></i></a>
                <a title="Sửa Sản Phẩm" href="' . route('admin.product-variant.edit', $query->id) . '" class="btn btn-teal-gradient btn-wave waves-effect waves-light"><i class="fas fa-edit"></i></a>
                <a title="Xóa Sản Phẩm" data-id="' . $query->id . '" href="' . route('admin.product-variant.destroy', $query->id) . '" class="btn btn-danger-gradient btn-wave waves-effect waves-light deleteBtn"><i class="fas fa-trash"></i></a>
                ';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-toggle-switch d-flex align-items-center my-4">
                                                <input data-id="' . $query->id . '" id="toggleswitchPrimary_' . $query->id . '" class="toggleswitchStatus" name="toggleswitch001" type="checkbox" ' . ($query->status == 1 ? 'checked' : '') . '>
                                                <label for="toggleswitchPrimary_' . $query->id . '" class="label-primary"></label><span class="ms-3"></span>
                                            </div>';
            })
            ->addColumn('created_at', function ($query) {
                return $query->created_at->format('d/m/Y H:i:s');
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id', request()->product)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productvariant-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariant_' . date('YmdHis');
    }
}
