<?php namespace Anomaly\NavigationModule\Link\Support\MultipleFieldType;

/**
 * Class SelectedTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SelectedTableBuilder extends \Anomaly\MultipleFieldType\Table\SelectedTableBuilder
{

    /**
     *
     * @var array
     */
    protected $filters = [
        'menu',
        'target',
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'link' => [
            'sort_column' => 'title',
            'wrapper'     => '
                    <strong>{value.title}</strong>
                    <br>
                    <small class="text-muted">{value.url}</small>',
            'value'       => [
                'url'   => 'entry.url',
                'title' => 'entry.title',
            ],
        ],
        'entry.type.title',
        'menu',
    ];

    protected $options = [
        'order_by' => [
            'parent_id'  => 'ASC',
            'sort_order' => 'ASC',
        ],
    ];

}
