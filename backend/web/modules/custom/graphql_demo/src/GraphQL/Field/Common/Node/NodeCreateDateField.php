<?php

namespace Drupal\graphql_demo\GraphQL\Field\Common\Node;

use Drupal\node\NodeInterface;
use Drupal\graphql_demo\GraphQL\Field\SelfAwareField;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class NodeCreateDateField extends SelfAwareField {

  /**
   * {@inheritdoc}
   */
  public function resolve($value, array $args, ResolveInfo $info) {
    if ($value instanceof NodeInterface) {
      return date_iso8601($value->getCreatedTime());
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return new NonNullType(new StringType());
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'createdDate';
  }
}