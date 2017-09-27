<?php

use Illuminate\Database\Seeder;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Sample project', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis mattis diam, at aliquam tellus congue vel. Vivamus et elit et purus feugiat sodales. Nam volutpat nec risus eu feugiat. In sed egestas ex, vel commodo ex. Sed sed semper metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tincidunt efficitur bibendum. Sed porta mollis porta. Nulla tincidunt fermentum ex, in sollicitudin ex eleifend id. Pellentesque eget vestibulum lectus. Vestibulum elementum ante eget sagittis dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis malesuada tellus lacinia eleifend.',],
            ['id' => 2, 'title' => 'Sample project 2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis mattis diam, at aliquam tellus congue vel. Vivamus et elit et purus feugiat sodales. Nam volutpat nec risus eu feugiat. In sed egestas ex, vel commodo ex. Sed sed semper metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tincidunt efficitur bibendum. Sed porta mollis porta. Nulla tincidunt fermentum ex, in sollicitudin ex eleifend id. Pellentesque eget vestibulum lectus. Vestibulum elementum ante eget sagittis dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis malesuada tellus lacinia eleifend.',],
            ['id' => 3, 'title' => 'Sample project 3', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis mattis diam, at aliquam tellus congue vel. Vivamus et elit et purus feugiat sodales. Nam volutpat nec risus eu feugiat. In sed egestas ex, vel commodo ex. Sed sed semper metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tincidunt efficitur bibendum. Sed porta mollis porta. Nulla tincidunt fermentum ex, in sollicitudin ex eleifend id. Pellentesque eget vestibulum lectus. Vestibulum elementum ante eget sagittis dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis malesuada tellus lacinia eleifend.',],

        ];

        foreach ($items as $item) {
            \App\Project::create($item);
        }
    }
}
