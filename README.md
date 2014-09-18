<h1>Auxílio NF-e</h1>
<h2>Dependências:</h2>
<p>Caso seja necessário realizar alguma alteração de layout, você deve instalar as dependências do projeto para fazer as devidas modificações.</p>
<ul>
<li><a href="http://nodejs.org/">nodejs</a></li>
<li><a href="http://compass-style.org/install/">compass</a></li>
<li><a href="http://gruntjs.com/">grunt</a></li>
<li><a href="http://bower.io/">bower</a></li>
</ul>
<h2>Setup</h2>
<p>Depois de instalado todas as dependências, entre no terminal ou prompt de comando na pasta do tema e:</p>
<ul>
<li><code>npm install</code> para instalar os modulos do node
<li><code>bower install</code> para instalar os scripts necessários</li>
<li>E só após isso <code>grunt</code> para deixar o grunt rodando</li>
</ul>
<p>O layout já pode ser mudado</p>
<ul>
<li>Caso queira alterar o css, altere o arquivo <i><u>assets/sass/_style.scss</u></i>.</li>
<li>Caso queira alterar script, altere o arquivo <i><u>assets/js/modules/common.js</u></i></li>
</ul>
<p>Após as modificações, pare o grunt no terminal ou prompt de comando e use o comando <code>grunt build</code>. Isso criará uma pasta chamada <b>dist</b> com as versões de css e javascript minificadas.</p>