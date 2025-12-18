<?php

namespace App\DataTables;

use App\Models\ProductComment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductCommentDataTable extends DataTable
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
                <a title="Xóa Sản Phẩm" data-id="' . $query->id . '" href="' . route('admin.comment.destroy', $query->id) . '" class="btn btn-danger-gradient btn-wave waves-effect waves-light deleteBtn"><i class="fas fa-trash"></i></a>
                ';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-toggle-switch d-flex align-items-center my-4">
                                                <input data-id="' . $query->id . '" id="toggleswitchPrimary_' . $query->id . '" class="toggleswitchStatus" name="toggleswitch001" type="checkbox" ' . ($query->status == 1 ? 'checked' : '') . '>
                                                <label for="toggleswitchPrimary_' . $query->id . '" class="label-primary"></label><span class="ms-3"></span>
                                            </div>';
            })
            ->addColumn('product_id', function($query) {
                return $query->product->name;
            })
            ->addColumn('user_id', function($query) {
                return $query->user->name;
            })
            ->filterColumn('product_id', function($query, $keyword) {
                $query->whereHas('product', function($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })
            ->filterColumn('user_id', function($query, $keyword) {
                $query->whereHas('user', function($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })
            ->addColumn('created_at', function ($query) {
                return $query->created_at->format('d/m/Y H:i:s');
            })
            ->rawColumns(['action', 'status', 'product_id', 'user_id'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductComment $model): QueryBuilder
    {
        // Return ProductComment query and ReplyComments query
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productcomment-table')
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
            Column::make('product_id')->title('Sản Phẩm'),
            Column::make('user_id')->title('Nguời Dùng'),
            Column::make('comment')->title('Bình Luận'),
            Column::make('rating')->title('Đánh Giá'),
            Column::make('status')->title('Trạng Thái'),
            Column::computed('action')->title('Hành Động')
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
        return 'ProductComment_' . date('YmdHis');
    }
}
