<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserSoftDeleteDataTable extends DataTable
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
                <a title="Khôi Phục Khách Hàng" data-id="' . $query->id . '" href="' . route('admin.user.restore', $query->id) . '" class="btn btn-teal-gradient btn-wave waves-effect waves-light restoreUserBtn"><i class="fas fa-trash-undo-alt"></i></a>
                <a title="Xóa Vĩnh Viễn" data-id="' . $query->id . '" href="' . route('admin.user.force-delete', $query->id) . '" class="btn btn-danger-gradient btn-wave waves-effect waves-light deleteForever"><i class="fas fa-infinity"></i></a>
                ';
            })
            ->addColumn('status', function ($query) {
                return '<div class="custom-toggle-switch d-flex align-items-center my-4">
                                                <input data-id="' . $query->id . '" id="toggleswitchPrimary_' . $query->id . '" class="toggleswitchStatus" name="toggleswitch001" type="checkbox" ' . ($query->status == 1 ? 'checked' : '') . '>
                                                <label for="toggleswitchPrimary_' . $query->id . '" class="label-primary"></label><span class="ms-3"></span>
                                            </div>';
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" class="img-fluid" style="max-width: 100px; border-radius: 6px;">';
            })
            ->rawColumns(['action', 'status', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->onlyTrashed();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
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
            Column::make('image'),
            Column::make('name'),
            Column::make('email'),
            Column::make('role'),
            Column::make('phone'),
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
        return 'User_' . date('YmdHis');
    }
}
