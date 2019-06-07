<?php
namespace App\Form;
use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Nom de l\'événement',
                ),
            ))
            ->add('startAt', null, array(
                'label' => 'Début',
                'date_widget' => 'single_text',
            ))
            ->add('endAt', null, array(
                'label' => 'Fin',
                'date_widget' => 'single_text',
            ))
            ->add('description')
            ->add('picture', UrlType::class, array(
                'label' => 'URL'
            ))
            ->add('price', MoneyType::class )
            ->add('capacity', NumberType::class )
            ->add('place', null, array(
                'choice_label' => 'name',
            ))
            ->add('categories', null, array(
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}