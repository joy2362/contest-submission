Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'contest-submission',
      path: '/contest-submission',
      component: require('./components/Tool'),
    },
      {
          name: 'submission',
          path: '/contest-submission/:id',
          component: require('./components/submission'),
      },
  ])


})
