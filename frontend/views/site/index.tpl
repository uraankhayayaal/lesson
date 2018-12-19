{set title="My Yii Application"}
{meta keywords="Yii,PHP,Smarty,framework"}
{description}This is my page about Smarty extension{/description}

{use class="yii\helpers\Html"}

{$post = 123}
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>This is absolute url</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>

                <p><a href="{url route='site/about' param=$post}">About</a></p>
            </div>
            <div class="col-lg-4">
                <h2>This is relative url</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>

                <p><a href="{path route='site/about' param=$post}">About</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Support</h2>

                <p>For contact with me:</p>

                <p>{Html::mailto('uraankhayayaal@gmail.com')}</p>
            </div>
        </div>

    </div>
</div>
