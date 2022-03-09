<?php

namespace App\Form;

use App\Entity\TraceFile;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class TraceFileType extends TraceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);
        $builder->add('fichier', DropzoneType::class, [
            'label' => 'Votre fichier',
            'required' => false,
            'help' => 'trace.file.help',
            'attr' => [
                'class' => 'border-2 border-indigo-500 border-dashed rounded-md',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TraceFile::class
        ]);
    }
}
