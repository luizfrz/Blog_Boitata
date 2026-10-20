<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::firstOrCreate(['slug' => 'mardonio-franca'], [
            'name' => 'Mardônio França', 'group' => 'pajé', 'sort' => 1,
            'role' => 'Físico e Cientista de Dados · Engenheiro de Dados e Poeta',
            'bio' => '<p>Físico e cientista de dados, poeta e um dos fundadores do Boitatá. Bacharel em Física pela Universidade Federal do Ceará (2012–2021), com o trabalho <em>Férmions de Majorana</em>, orientado pelo Prof. Dr. Carlos Alberto Santos de Almeida.</p>'
                .'<h3>Áreas de atuação</h3><p>Física · Ciência da Computação · Artes</p>'
                .'<h3>Idiomas</h3><p>Inglês: compreende bem, fala razoavelmente, lê bem, escreve bem.<br>Espanhol: compreende razoavelmente, fala pouco, lê bem, escreve razoavelmente.</p>'
                .'<h3>Trajetória profissional</h3><ul>'
                .'<li>2022–atual — Stefanini: Engenheiro de Big Data / Cientista de Dados</li>'
                .'<li>2022 — Iguá Saneamento: Engenheiro de Dados</li>'
                .'<li>2021–2022 — Indra: Engenheiro de Dados / Cientista</li>'
                .'<li>2020–2021 — Insight Lab: Engenheiro de Dados / Líder Técnico</li>'
                .'<li>2020 — Boitatá LAB: Engenheiro de Dados</li>'
                .'<li>2018–2020 — Casa Magalhães: Cientista de Dados</li>'
                .'<li>2017–2018 — Delfos IM: Arquiteto de Sistemas / Cientista de Dados</li>'
                .'<li>2016–2017 — ERDOS: Analista de Sistemas</li>'
                .'<li>2013–2015 — Group of Computer Networks, Software Engineering and Systems: Analista de Sistemas</li>'
                .'<li>2006–2012 — Instituto Atlântico: Analista de Sistemas</li></ul>',
        ]);

        $team = [
            ['pajé', 'Vinicius Sampaio', 'Engenheiro de Dados [Indra S.A]'],
            ['pajé', 'Luan Misael', 'Cientista de Dados [Nubank]'],
            ['pajé', 'Emanuel Fonteles', 'Cientista de Dados [Data Risk]'],
            ['pajé', 'Lucas Miranda', 'Cientista de Dados e Físico [Unicamp]'],
            ['pajé', 'Daniel Brito de Araújo', 'Físico (UFC), Pesquisador [Freie Universität Berlin]'],
            ['curumim', 'Ingrid Vieira', 'Cientista de Dados Jr, Programadora'],
            ['curumim', 'Otávio Furtado', 'Físico, Mestrando (UFC), Pesquisador, Cientista de Dados Jr'],
            ['curumim', 'Lucas Moreira', 'Físico, Mestrando (UFC), Cientista de Dados Trainee'],
            ['curumim', 'Vlailda Rodrigues', 'Cientista de Dados Trainee, Analista Contábil [Grupo Edson Queiroz]'],
            ['curumim', 'Davi França', 'Administrador (UECE), Cientista de Dados Trainee'],
            ['curumim', 'Daniele de Azevedo Maciel', 'Cientista de Dados Trainee, Música, Física (UFC) (Graduanda)'],
            ['curumim', 'Rodrigo Mesquita', 'Analista de Redes, Mestrando em Eng. da Computação (IFCE), Cientista de Dados Trainee'],
            ['curumim', 'Julio Cezar Moura de Oliveira Júnior', 'Cozinheiro amador, Medicina [UFC] (Graduando), Cientista de Dados Trainee'],
        ];
        foreach ($team as $i => [$group, $name, $role]) {
            Member::firstOrCreate(['slug' => Str::slug($name)], compact('group', 'name', 'role') + ['sort' => $i + 2]);
        }
    }
}
