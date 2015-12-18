<?php namespace Anomaly\NavigationModule\Link\Tree;

use Anomaly\NavigationModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class LinkTreeBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\NavigationModule\Link\Tree
 */
class LinkTreeBuilder extends TreeBuilder
{

    /**
     * The group instance.
     *
     * @var null|GroupInterface
     */
    protected $group = null;

    /**
     * The tree buttons.
     *
     * @var array
     */
    protected $buttons = [
        'add'  => [
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'text'        => 'anomaly.module.navigation::button.create_child_link',
            'href'        => 'admin/navigation/links/choose/{request.route.parameters.group}?parent={entry.id}'
        ],
        'view' => [
            'target' => '_blank'
        ],
        'delete'
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getGroup()) {
            throw new \Exception('The $group parameter is required.');
        }
    }

    /**
     * Fired just before starting the query.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        $group = $this->getGroup();

        $query->where('group_id', $group->getId());
    }

    /**
     * Get the group.
     *
     * @return GroupInterface|null
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set the group.
     *
     * @param $group
     * @return $this
     */
    public function setGroup(GroupInterface $group)
    {
        $this->group = $group;

        return $this;
    }
}
