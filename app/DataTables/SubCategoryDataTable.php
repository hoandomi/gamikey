<?php

namespace App\DataTables;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
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
                <a title="Sửa Sản Phẩm" href="' . route('admin.sub-category.edit', $query->id) . '" class="btn btn-teal-gradient btn-wave waves-effect waves-light"><i class="fas fa-edit"></i></a>
                <a title="Xóa Sản Phẩm" data-id="' . $query->id . '" href="' . route('admin.sub-category.destroy', $query->id) . '" class="btn btn-danger-gradient btn-wave waves-effect waves-light deleteBtn"><i class="fas fa-trash"></i></a>
                ';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-toggle-switch d-flex align-items-center my-4">
                                                <input data-id="' . $query->id . '" id="toggleswitchPrimary_' . $query->id . '" class="toggleswitchStatus" name="toggleswitch001" type="checkbox" ' . ($query->status == 1 ? 'checked' : '') . '>
                                                <label for="toggleswitchPrimary_' . $query->id . '" class="label-primary"></label><span class="ms-3"></span>
                                            </div>';
            })
            ->addColumn('category_id', function ($query) {
                return $query->category->name;
            })
            ->filterColumn('category_id', function ($query, $keyword) {
                $query->whereHas('category', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
            })
            ->addColumn('created_at', function ($query) {
                return $query->created_at->format('d/m/Y H:i:s');
            })
            ->rawColumns(['action', 'status', 'category_id'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subcategory-table')
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
            Column::make('category_id')->title('Danh Mục'),
            Column::make('name')->title('Danh Mục Phụ'),
            Column::make('status')->title('Trạng Thái'),
            Column::make('description')->title('Mô Tả'),
            Column::make('created_at')->title('Ngày Tạo'),
            Column::computed('action')
                ->exportable(FALSE)
                ->printable(FALSE)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
