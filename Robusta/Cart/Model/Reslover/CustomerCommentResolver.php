<?php

namespace Robusta\Cart\Model\Resolver;
use Magento\Framework\GraphQl\Query\ResolverInterface;

class CustomerCommentResolver implements ResolverInterface{

    private $customerCommentRepository;
    public function __construct(CustomerCommentRepositoryInterface $customerCommentRepository){
        $this -> customerCommentRepository = $customerCommentRepository;
     }
    public function resolve(Feild $feild, $context , ResolveInfo $info , array $value =null , array $args = null){
        return $this ->customerCommentRepository->getComment();
    }
}