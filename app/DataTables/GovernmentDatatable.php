<?php

namespace App\DataTables;

use App\Models\Government;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class GovernmentDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'governemtdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Government $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Government $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('Government-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->lengthMenu(
                [
                    [10, 25, 50, -1],
                    ['10 صـفوف', '25 صـف', '50 صـف', 'كل الصـفوف']
                ])
            ->parameters([
                'language' => [app()->getLocale() == 'en' ?: 'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json']

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name_ar')->title(trans('governments.name_ar')),
            Column::make('name_en')->title(trans('governments.name_en')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Government_' . date('YmdHis');
    }
}
