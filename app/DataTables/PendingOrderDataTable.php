<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendingOrderDataTable extends DataTable
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
                <a title="Sửa Sản Phẩm" href="' . route('admin.order.show', $query->id) . '" class="btn btn-teal-gradient btn-wave waves-effect waves-light"><i class="fas fa-eye"></i></a>
                <a title="Xóa Sản Phẩm" data-id="' . $query->id . '" href="' . route('admin.category.destroy', $query->id) . '" class="btn btn-danger-gradient btn-wave waves-effect waves-light deleteBtn"><i class="fas fa-trash"></i></a>
                ';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-toggle-switch d-flex align-items-center my-4">
                                                <input data-id="' . $query->id . '" id="toggleswitchPrimary_' . $query->id . '" class="toggleswitchStatus" name="toggleswitch001" type="checkbox" ' . ($query->status == 1 ? 'checked' : '') . '>
                                                <label for="toggleswitchPrimary_' . $query->id . '" class="label-primary"></label><span class="ms-3"></span>
                                            </div>';
            })
            // FORMAT PRICE TO VND
            ->addColumn('total_amount', function ($query) {
                return number_format($query->total_amount, 0, ',', '.') . ' VND';
            })
            ->rawColumns(['action', 'status', 'total_amount'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->where('order_status', 0)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendingorder-table')
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
            Column::make('invoice_id'),
            Column::make('customer_name'),
            Column::make('customer_email'),
            Column::make('customer_phone'),
            Column::make('total_amount'),
            Column::make('currency_name'),
            Column::make('payment_method'),
            Column::make('payment_status'),
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
        return 'PendingOrder_' . date('YmdHis');
    }
}
