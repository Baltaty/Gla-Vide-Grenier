app.controller("blogsCtrl", function ($scope) {


    try{
        blogVideoCarousel();

    }catch (error){
        console.error(error);
    };

});