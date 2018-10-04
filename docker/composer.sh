docker run                                                                                                             \
    --rm                                                                                                               \
    --name taskbook_cli                                                                                           \
    -v ${PWD}:/data                                                                                   \
    -w /data                                                                                                           \
    taskbook:latest                                                                                           \
    composer $@
